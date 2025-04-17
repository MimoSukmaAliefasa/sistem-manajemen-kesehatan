{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pemeriksaan Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        
        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, 0.1);
            width: 250px;
            background-color: #343a40;
            color: white;
            transition: all 0.3s;
        }
        
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 0.75rem 1rem;
            font-weight: 500;
        }
        
        .sidebar .nav-link.active {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .sidebar .nav-link:hover {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: 0.5rem;
            overflow-x: hidden;
            overflow-y: auto;
        }
        
        /* Main Content Styles */
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        
        .card-header {
            background-color: #0d6efd;
            color: white;
            font-weight: bold;
        }
        
        .table-actions {
            white-space: nowrap;
        }
        
        .modal-header {
            background-color: #0d6efd;
            color: white;
        }
        
        .form-table td {
            padding: 12px;
            vertical-align: top;
        }
        
        .form-table tr:not(:last-child) td {
            border-bottom: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar">
        <div class="sidebar-sticky">
            <div class="p-3 text-center">
                <h4>SISMERIKES</h4>
                <hr class="bg-light">
            </div>
            
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-user-injured me-2"></i> Pasien
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-user-md me-2"></i> Dokter
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-pills me-2"></i> Obat
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-file-medical me-2"></i> Pemeriksaan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-cog me-2"></i> Pengaturan
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Daftar Pasien Periksa</h5>
                    <span class="badge bg-light text-dark">
                        <i class="fas fa-user-md me-1"></i> Dr. John Doe
                    </span>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="30%">Nama</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Peter Parker</td>
                                    <td class="table-actions">
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <button class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i> Lihat
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>rt04 akeris</td>
                                    <td class="table-actions">
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <button class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i> Lihat
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>bengiod_user</td>
                                    <td class="table-actions">
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <button class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i> Lihat
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Juedi</td>
                                    <td class="table-actions">
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <button class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i> Lihat
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="card-footer text-center text-muted">
                    <small>Copyright © 2025 Bengkek Nesling. All rights reserved.</small>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Pemeriksaan Pasien</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <h5>SISMENKES</h5>
                        <p class="mb-2"><strong>Dr. John Dee</strong></p>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-light p-2">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Memeriksa</a></li>
                                <li class="breadcrumb-item active">Edit Pemeriksaan</li>
                            </ol>
                        </nav>
                    </div>
                    
                    <hr>
                    
                    <h4 class="mb-4">Edit Pemeriksaan Pasien</h4>
                    
                    <table class="table form-table">
                        <tbody>
                            <tr>
                                <td width="30%"><strong>Nama Pasien</strong></td>
                                <td>
                                    <input type="text" class="form-control" value="Peter Parker" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Tanggal Pemeriksaan</strong></td>
                                <td>
                                    <input type="text" class="form-control" value="28/03/2025" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Catatan</strong></td>
                                <td>
                                    <textarea class="form-control" rows="3">pak jantung nya diganti aja pake botoi yakait11</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Obat</strong></td>
                                <td>
                                    <select class="form-select">
                                        <option>Pil Obat</option>
                                        <option selected>Sirup Obat</option>
                                        <option>Kapsul Obat</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Total Harga</strong></td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="text" class="form-control" value="502.000">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                </div>
                <div class="modal-footer justify-content-center">
                    <small class="text-muted">Copyright © 2025 Bengket Koding. All rights reserved. Version 1.0.0</small>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Fungsi untuk CRUD
        document.addEventListener('DOMContentLoaded', function() {
            // Contoh fungsi untuk edit
            const editButtons = document.querySelectorAll('.btn-primary');
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Di sini bisa ditambahkan logika untuk mengisi modal dengan data pasien
                    console.log('Edit data pasien');
                });
            });
            
            // Fungsi untuk hapus
            const deleteButtons = document.querySelectorAll('.btn-danger');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                        // Logika untuk menghapus data
                        const row = this.closest('tr');
                        row.remove();
                        console.log('Data dihapus');
                    }
                });
            });
        });
    </script>
</body>
</html> --}}

@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Welcome')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Pasien Periksa</h3>
            </div>
        </div>
    </div>
@endsection

{{-- Add any additional scripts or styles here --}}