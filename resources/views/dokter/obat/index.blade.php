@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Welcome')

@section('content_body')
<div class="card">
    <div class="card-header">Obat</div>

    <div class="card-body">
        <body>
            <style>
                /* Main Styles */
                body { background-color: #f8f9fa; padding: 20px; }
                .container { max-width: 1200px; margin: 0 auto; }
                h1 { color: #212529; text-align: center; margin-bottom: 30px; }
                
                /* Card Styles */
                .card { border: 1px solid #dee2e6; border-radius: 5px; margin-bottom: 20px; }
                .card-header { background-color: #0d6efd; color: white; padding: 12px 20px; }
                .card-body { padding: 20px; }
                
                /* Form Styles */
                .form-label { font-weight: 500; margin-bottom: 5px; }
                .form-control, .form-select { padding: 8px 12px; border: 1px solid #ced4da; }
                .input-group-text { background-color: #e9ecef; }
                
                /* Button Styles */
                .btn { padding: 8px 16px; margin-right: 8px; }
                .btn-primary { background-color: #0d6efd; }
                .btn-warning { background-color: #ffc107; color: #000; }
                .btn-danger { background-color: #dc3545; }
                .btn-secondary { background-color: #6c757d; }
                .btn-sm { padding: 5px 10px; font-size: 14px; }
                
                /* Table Styles */
                .table { width: 100%; margin-bottom: 20px; }
                .table thead th { background-color: #f1f1f1; padding: 12px; }
                .table tbody td { padding: 12px; vertical-align: middle; }
                .table-striped tbody tr:nth-child(odd) { background-color: rgba(0,0,0,0.02); }
                .table-hover tbody tr:hover { background-color: rgba(0,0,0,0.04); }
                
                /* Utility Styles */
                .mt-4 { margin-top: 20px; }
                .mb-4 { margin-bottom: 20px; }
                .custom-packaging { margin-top: 8px; display: none; }
                .id-display { font-weight: bold; color: #0d6efd; }
            </style>
        
            <div class="container">
                <h1>Dokter</h1>
                
                <!-- Medicine Form -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h2 class="h5 mb-0">Tambah Obat</h2>
                    </div>
                    <div class="card-body">
                        <form id="medicineForm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">ID Obat</label>
                                    <div class="id-display" id="medicineIdDisplay">Akan digenerate otomatis</div>
                                    <input type="hidden" id="medicineId">
                                </div>
                                <div class="col-md-6">
                                    <label for="medicineName" class="form-label">Nama Obat</label>
                                    <input type="text" class="form-control" id="medicineName" placeholder="Masukkan Nama Obat" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="packaging" class="form-label">Kemasan</label>
                                    <select class="form-select" id="packaging" required>
                                        <option value="" selected disabled>Pilih Kemasan</option>
                                        <option value="Dus">Dus</option>
                                        <option value="Pil">Pil</option>
                                        <option value="Sirup">Sirup</option>
                                        <option value="Kapsul">Kapsul</option>
                                        <option value="Tablet">Tablet</option>
                                        <option value="Other">Lainnya</option>
                                    </select>
                                    <input type="text" class="form-control custom-packaging" id="customPackaging" placeholder="Masukkan Kemasan Lainnya">
                                </div>
                                <div class="col-md-6">
                                    <label for="price" class="form-label">Harga</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" class="form-control" id="price" placeholder="Masukkan Harga" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-4">
                                <button type="button" class="btn btn-primary" id="addBtn">Tambah Obat</button>
                                <button type="button" class="btn btn-warning" id="updateBtn" style="display:none">Update Obat</button>
                                <button type="button" class="btn btn-secondary" id="cancelBtn" style="display:none">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
        
                <!-- Medicine List -->
                <div class="card">
                    <div class="card-header">
                        <h2 class="h5 mb-0">List Obat</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="medicineTable">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>ID Obat</th>
                                        <th>Nama Obat</th>
                                        <th>Kemasan</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data will be inserted here by JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Bootstrap JS Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            
            <script>
                // Initialize medicine data with auto-generated IDs
                let medicines = [
                    { id: 'MED-0001', name: 'Paracetamol', packaging: 'Dus', price: 20000 },
                    { id: 'MED-0002', name: 'Obat Tidur', packaging: 'Pil', price: 10000 },
                    { id: 'MED-0003', name: 'Actived', packaging: 'Sirup', price: 50000 }
                ];
                let currentEditIndex = -1;
        
                // Generate unique medicine ID (format: MED-0001)
                function generateMedicineId() {
                    const prefix = 'MED-';
                    const existingNumbers = medicines.map(med => {
                        const numStr = med.id.replace(prefix, '');
                        return parseInt(numStr);
                    });
                    
                    const maxNum = existingNumbers.length > 0 ? Math.max(...existingNumbers) : 0;
                    const nextNum = maxNum + 1;
                    return prefix + String(nextNum).padStart(4, '0');
                }
        
                // DOM Ready Function
                function initializeApp() {
                    renderTable();
                    setupEventListeners();
                }
        
                // Event Listeners Setup
                function setupEventListeners() {
                    document.getElementById('packaging').addEventListener('change', function() {
                        document.getElementById('customPackaging').style.display = 
                            this.value === 'Other' ? 'block' : 'none';
                    });
        
                    document.getElementById('addBtn').addEventListener('click', addMedicine);
                    document.getElementById('updateBtn').addEventListener('click', updateMedicine);
                    document.getElementById('cancelBtn').addEventListener('click', cancelEdit);
                }
        
                // Render Medicine Table
                function renderTable() {
                    const tbody = document.querySelector('#medicineTable tbody');
                    tbody.innerHTML = '';
                    
                    medicines.forEach((medicine, index) => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${index + 1}</td>
                            <td>${medicine.id}</td>
                            <td>${medicine.name}</td>
                            <td>${medicine.packaging}</td>
                            <td>Rp${medicine.price.toLocaleString('id-ID')}</td>
                            <td>
                                <button class="btn btn-sm btn-warning edit-btn" onclick="editMedicine(${index})">Edit</button>
                                <button class="btn btn-sm btn-danger delete-btn" onclick="deleteMedicine(${index})">Hapus</button>
                            </td>
                        `;
                        tbody.appendChild(row);
                    });
                }
        
                // Add New Medicine
                function addMedicine() {
                    const id = generateMedicineId();
                    const name = document.getElementById('medicineName').value.trim();
                    let packaging = document.getElementById('packaging').value;
                    const customPackaging = document.getElementById('customPackaging').value.trim();
                    const price = parseInt(document.getElementById('price').value);
                    
                    if (validateForm(name, packaging, customPackaging, price)) {
                        if (packaging === 'Other') packaging = customPackaging;
                        
                        medicines.push({ id, name, packaging, price });
                        renderTable();
                        clearForm();
                        showAlert('Obat berhasil ditambahkan!', 'success');
                    }
                }
        
                // Edit Medicine
                function editMedicine(index) {
                    const medicine = medicines[index];
                    currentEditIndex = index;
                    
                    document.getElementById('medicineId').value = medicine.id;
                    document.getElementById('medicineIdDisplay').textContent = medicine.id;
                    document.getElementById('medicineName').value = medicine.name;
                    document.getElementById('price').value = medicine.price;
                    
                    const packagingSelect = document.getElementById('packaging');
                    const isCustom = !Array.from(packagingSelect.options)
                        .some(opt => opt.value === medicine.packaging);
                    
                    if (isCustom) {
                        packagingSelect.value = 'Other';
                        document.getElementById('customPackaging').value = medicine.packaging;
                        document.getElementById('customPackaging').style.display = 'block';
                    } else {
                        packagingSelect.value = medicine.packaging;
                        document.getElementById('customPackaging').style.display = 'none';
                    }
                    
                    toggleFormButtons(false);
                    document.getElementById('medicineForm').scrollIntoView({ behavior: 'smooth' });
                }
        
                // Update Medicine
                function updateMedicine() {
                    if (currentEditIndex === -1) return;
                    
                    const id = document.getElementById('medicineId').value;
                    const name = document.getElementById('medicineName').value.trim();
                    let packaging = document.getElementById('packaging').value;
                    const customPackaging = document.getElementById('customPackaging').value.trim();
                    const price = parseInt(document.getElementById('price').value);
                    
                    if (validateForm(name, packaging, customPackaging, price)) {
                        if (packaging === 'Other') packaging = customPackaging;
                        
                        medicines[currentEditIndex] = { id, name, packaging, price };
                        renderTable();
                        clearForm();
                        toggleFormButtons(true);
                        showAlert('Obat berhasil diupdate!', 'success');
                    }
                }
        
                // Delete Medicine
                function deleteMedicine(index) {
                    if (confirm('Apakah Anda yakin ingin menghapus obat ini?')) {
                        medicines.splice(index, 1);
                        renderTable();
                        
                        if (currentEditIndex === index) {
                            cancelEdit();
                        } else if (currentEditIndex > index) {
                            currentEditIndex--;
                        }
                        
                        showAlert('Obat berhasil dihapus!', 'danger');
                    }
                }
        
                // Form Validation
                function validateForm(name, packaging, customPackaging, price) {
                    if (!name || isNaN(price)) {
                        showAlert('Harap isi semua field dengan benar!', 'danger');
                        return false;
                    }
                    
                    if (packaging === 'Other' && !customPackaging) {
                        showAlert('Harap masukkan jenis kemasan lainnya!', 'danger');
                        return false;
                    }
                    
                    return true;
                }
        
                // Helper Functions
                function clearForm() {
                    document.getElementById('medicineForm').reset();
                    document.getElementById('customPackaging').style.display = 'none';
                    document.getElementById('medicineIdDisplay').textContent = 'Akan digenerate otomatis';
                }
        
                function cancelEdit() {
                    currentEditIndex = -1;
                    clearForm();
                    toggleFormButtons(true);
                }
        
                function toggleFormButtons(isAddMode) {
                    document.getElementById('addBtn').style.display = isAddMode ? 'inline-block' : 'none';
                    document.getElementById('updateBtn').style.display = isAddMode ? 'none' : 'inline-block';
                    document.getElementById('cancelBtn').style.display = isAddMode ? 'none' : 'inline-block';
                }
        
                function showAlert(message, type) {
                    // Remove existing alerts
                    const existingAlert = document.querySelector('.alert');
                    if (existingAlert) existingAlert.remove();
                    
                    // Create new alert
                    const alertDiv = document.createElement('div');
                    alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
                    alertDiv.innerHTML = `
                        ${message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    `;
                    
                    // Insert alert
                    document.querySelector('.container').prepend(alertDiv);
                    
                    // Auto-dismiss
                    setTimeout(() => {
                        bootstrap.Alert.getInstance(alertDiv)?.close();
                    }, 3000);
                }
        
                // Initialize the application
                document.addEventListener('DOMContentLoaded', initializeApp);
            </script>
        </body>
    </div>
</div>
@endsection