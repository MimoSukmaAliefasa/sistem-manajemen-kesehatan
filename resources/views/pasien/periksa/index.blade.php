@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Welcome')

@section('content_body')
<div class="card">
    <div class="card-header">Periksa</div>
    <div class="card-body">
        <body>
    <div class="container mt-5">
        <h2>Pasien</h2>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5>Periksa</h5>
            <input type="text" id="searchInput" class="form-control" onkeyup="searchPatient()" placeholder="Cari Pasien..." style="width: 200px;">
        </div>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #0d6efd;
            color: white;
            border-radius: 10px 10px 0 0 !important;
        }
        .btn-action {
            padding: 5px 10px;
            margin: 0 3px;
            font-size: 14px;
        }
        .table th {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="mb-0">Pasien</h3>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Periksa</h4>
                        
                        <form id="patientForm">
                            <div class="mb-3">
                                <label for="patientName" class="form-label">Nama Anda</label>
                                <input type="text" class="form-control" id="patientName" placeholder="Masukkan nama lengkap" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="doctorSelect" class="form-label">Pilih Dokter</label>
                                <select class="form-select" id="doctorSelect" required>
                                    <option value="" selected disabled>-- Pilih Dokter --</option>
                                    <option value="1">Dr. Andi Pratama (Spesialis Jantung)</option>
                                    <option value="2">Dr. Budi Santoso (Spesialis Anak)</option>
                                    <option value="3">Dr. Citra Dewi (Spesialis Kulit)</option>
                                    <option value="4">Dr. Dian Sari (Spesialis Penyakit Dalam)</option>
                                </select>
                            </div>
                            
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" id="resetBtn">Reset</button>
                                <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Daftar Pemeriksaan</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="examinationTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pasien</th>
                                        <th>Dokter</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data akan diisi oleh JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Pemeriksaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" id="editId">
                        <div class="mb-3">
                            <label for="editPatientName" class="form-label">Nama Pasien</label>
                            <input type="text" class="form-control" id="editPatientName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDoctorSelect" class="form-label">Dokter</label>
                            <select class="form-select" id="editDoctorSelect" required>
                                <option value="1">Dr. Andi Pratama</option>
                                <option value="2">Dr. Budi Santoso</option>
                                <option value="3">Dr. Citra Dewi</option>
                                <option value="4">Dr. Dian Sari</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="saveEditBtn">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Data contoh
        let examinations = [
            { id: 1, patientName: "Rina Wijaya", doctorId: "1", doctorName: "Dr. Andi Pratama", date: "2023-05-15" },
            { id: 2, patientName: "Budi Santoso", doctorId: "3", doctorName: "Dr. Citra Dewi", date: "2023-05-16" }
        ];

        // DOM Ready
        document.addEventListener('DOMContentLoaded', function() {
            renderTable();
            setupEventListeners();
        });

        // Render tabel
        function renderTable() {
            const tbody = document.querySelector('#examinationTable tbody');
            tbody.innerHTML = '';
            
            examinations.forEach((exam, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${exam.patientName}</td>
                    <td>${exam.doctorName}</td>
                    <td>${exam.date}</td>
                    <td>
                        <button class="btn btn-sm btn-warning btn-action edit-btn" data-id="${exam.id}">Edit</button>
                        <button class="btn btn-sm btn-danger btn-action delete-btn" data-id="${exam.id}">Hapus</button>
                    </td>
                `;
                tbody.appendChild(row);
            });
        }

        // Setup event listeners
        function setupEventListeners() {
            // Submit form
            document.getElementById('patientForm').addEventListener('submit', function(e) {
                e.preventDefault();
                addExamination();
            });
            
            // Reset form
            document.getElementById('resetBtn').addEventListener('click', resetForm);
            
            // Edit button
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('edit-btn')) {
                    openEditModal(e.target.dataset.id);
                }
                if (e.target.classList.contains('delete-btn')) {
                    deleteExamination(e.target.dataset.id);
                }
            });
            
            // Save edit
            document.getElementById('saveEditBtn').addEventListener('click', saveEdit);
        }

        // Tambah pemeriksaan baru
        function addExamination() {
            const patientName = document.getElementById('patientName').value;
            const doctorSelect = document.getElementById('doctorSelect');
            const doctorId = doctorSelect.value;
            const doctorName = doctorSelect.options[doctorSelect.selectedIndex].text;
            
            const newExam = {
                id: Date.now(),
                patientName,
                doctorId,
                doctorName,
                date: new Date().toISOString().split('T')[0]
            };
            
            examinations.push(newExam);
            renderTable();
            resetForm();
            
            alert('Pemeriksaan berhasil ditambahkan!');
        }

        // Reset form
        function resetForm() {
            document.getElementById('patientForm').reset();
        }

        // Buka modal edit
        function openEditModal(id) {
            const exam = examinations.find(e => e.id == id);
            if (!exam) return;
            
            document.getElementById('editId').value = exam.id;
            document.getElementById('editPatientName').value = exam.patientName;
            document.getElementById('editDoctorSelect').value = exam.doctorId;
            
            const modal = new bootstrap.Modal(document.getElementById('editModal'));
            modal.show();
        }

        // Simpan perubahan
        function saveEdit() {
            const id = parseInt(document.getElementById('editId').value);
            const patientName = document.getElementById('editPatientName').value;
            const doctorSelect = document.getElementById('editDoctorSelect');
            const doctorId = doctorSelect.value;
            const doctorName = doctorSelect.options[doctorSelect.selectedIndex].text;
            
            const examIndex = examinations.findIndex(e => e.id === id);
            if (examIndex !== -1) {
                examinations[examIndex] = {
                    ...examinations[examIndex],
                    patientName,
                    doctorId,
                    doctorName
                };
                
                renderTable();
                const modal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
                modal.hide();
                
                alert('Perubahan berhasil disimpan!');
            }
        }

        // Hapus pemeriksaan
        function deleteExamination(id) {
            if (confirm('Apakah Anda yakin ingin menghapus pemeriksaan ini?')) {
                examinations = examinations.filter(e => e.id != id);
                renderTable();
                alert('Pemeriksaan berhasil dihapus!');
            }
        }
    </script>
</body>
    </div>
</div>
@endsection