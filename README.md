# BLACKBOX TESTING - API SIREKAP UTS PERANCANGAN WEB

## TESTING SUMMARY
- **Total Test Cases**: 20 test cases  
- **Coverage**: Semua endpoint yang ada di Postman Collection  
- **Metode**: API Testing dengan Postman  
- **Status**: SEMUA TEST CASES DIBUAT SESUAI POSTMAN  

---

## A. TESTING USER CONTROLLER

### A.1 Get All Data Users
| No | Endpoint | Method | Jenis Uji | Input | Output yang Diharapkan | Hasil Aktual | Status |
|----|----------|--------|-----------|-------|----------------------|--------------|--------|
| 1.1 | `/api/users` | GET | Positive Test | - | Status 200, menampilkan array semua users | Menunggu testing | PENDING |

### A.2 Tambah Data Users
| No | Endpoint | Method | Jenis Uji | Input | Output yang Diharapkan | Hasil Aktual | Status |
|----|----------|--------|-----------|-------|----------------------|--------------|--------|
| 1.2 | `/api/users` | POST | Negative Test | `{"username": "test", "email": "admin01@sirekap.ac.id", "password": "123", "role": "invalid"}` | Status 422, validasi gagal - role tidak sesuai | Menunggu testing | PENDING |

### A.3 Edit Data Users
| No | Endpoint | Method | Jenis Uji | Input | Output yang Diharapkan | Hasil Aktual | Status |
|----|----------|--------|-----------|-------|----------------------|--------------|--------|
| 1.3 | `/api/users/1` | PUT | Positive Test | `{"username": "admin_updated1", "email": "admin_updated@sirekap.ac.id", "role": "admin", "is_active": 1, "ls_lock": 0}` | Status 200, data user berhasil diupdate | Menunggu testing | PENDING |

### A.4 Hapus Data Users
| No | Endpoint | Method | Jenis Uji | Input | Output yang Diharapkan | Hasil Aktual | Status |
|----|----------|--------|-----------|-------|----------------------|--------------|--------|
| 1.4 | `/api/users/3` | DELETE | Positive Test | - | Status 200, user berhasil dihapus | Menunggu testing | PENDING |

---

## B. TESTING DOSEN CONTROLLER

### B.1 Get All Data Dosen
| No | Endpoint | Method | Jenis Uji | Input | Output yang Diharapkan | Hasil Aktual | Status |
|----|----------|--------|-----------|-------|----------------------|--------------|--------|
| 2.1 | `/api/dosen` | GET | Positive Test | - | Status 200, menampilkan array semua dosen | Menunggu testing | PENDING |

### B.2 Tambah Data Dosen
| No | Endpoint | Method | Jenis Uji | Input | Output yang Diharapkan | Hasil Aktual | Status |
|----|----------|--------|-----------|-------|----------------------|--------------|--------|
| 2.2 | `/api/dosen` | POST | Positive Test | `{"id_dosen": "DSN003", "nidn": "1122334455", "nama_dosen": "Prof. Budi Santoso, Ph.D.", "gelar": "S.Si., M.Sc., Ph.D.", "no_hp": "085211223344", "email": "budi.santoso@sirekap.ac.id", "id_user": 6}` | Status 201, data dosen berhasil disimpan | Menunggu testing | PENDING |

### B.3 Edit Data Dosen
| No | Endpoint | Method | Jenis Uji | Input | Output yang Diharapkan | Hasil Aktual | Status |
|----|----------|--------|-----------|-------|----------------------|--------------|--------|
| 2.3 | `/api/dosen/DSN001` | PUT | Positive Test | `{"nama_dosen": "Dr. Ahmad S.Kom., M.Kom., Ph.D.", "gelar": "S.Kom., M.Kom., Ph.D.", "no_hp": "081234567899", "email": "ahmad.phd@sirekap.ac.id"}` | Status 200, data dosen berhasil diupdate | Menunggu testing | PENDING |

### B.4 Hapus Data Dosen
| No | Endpoint | Method | Jenis Uji | Input | Output yang Diharapkan | Hasil Aktual | Status |
|----|----------|--------|-----------|-------|----------------------|--------------|--------|
| 2.4 | `/api/dosen/DSN002` | DELETE | Positive Test | - | Status 200, dosen berhasil dihapus | Menunggu testing | PENDING |

---

## C. TESTING MATA KULIAH CONTROLLER

### C.1 Get All Data Mata Kuliah
| No | Endpoint | Method | Jenis Uji | Input | Output yang Diharapkan | Hasil Aktual | Status |
|----|----------|--------|-----------|-------|----------------------|--------------|--------|
| 3.1 | `/api/matakuliah` | GET | Positive Test | - | Status 200, menampilkan array semua mata kuliah | Menunggu testing | PENDING |

### C.2 Tambah Data Mata Kuliah
| No | Endpoint | Method | Jenis Uji | Input | Output yang Diharapkan | Hasil Aktual | Status |
|----|----------|--------|-----------|-------|----------------------|--------------|--------|
| 3.2 | `/api/matakuliah` | POST | Positive Test | `{"id_matakuliah": "MK0015", "kode_matakuliah": "JAR102", "nama_matakuliah": "Pemrograman Da Jaringan", "sks": 3, "semester": 3, "jenis": "praktikum", "id_dosen": "DSN003", "jenis_dosen": "pengampu"}` | Status 201, data mata kuliah berhasil disimpan | Menunggu testing | PENDING |

### C.3 Edit Data Mata Kuliah
| No | Endpoint | Method | Jenis Uji | Input | Output yang Diharapkan | Hasil Aktual | Status |
|----|----------|--------|-----------|-------|----------------------|--------------|--------|
| 3.3 | `/api/matakuliah/MK0015` | PUT | Positive Test | `{"kode_matakuliah": "JAR101", "nama_matakuliah": "Pemrograman Dan Jaringan", "sks": 3, "semester": 3, "jenis": "praktikum", "id_dosen": "DSN003", "jenis_dosen": "pengampu"}` | Status 200, data mata kuliah berhasil diupdate | Menunggu testing | PENDING |

### C.4 Hapus Data Mata Kuliah
| No | Endpoint | Method | Jenis Uji | Input | Output yang Diharapkan | Hasil Aktual | Status |
|----|----------|--------|-----------|-------|----------------------|--------------|--------|
| 3.4 | `/api/matakuliah/MK0002` | DELETE | Positive Test | - | Status 200, mata kuliah berhasil dihapus | Menunggu testing | PENDING |

---

## D. TESTING KELAS CONTROLLER

### D.1 Get All Data Kelas
| No | Endpoint | Method | Jenis Uji | Input | Output yang Diharapkan | Hasil Aktual | Status |
|----|----------|--------|-----------|-------|----------------------|--------------|--------|
| 4.1 | `/api/kelas` | GET | Positive Test | - | Status 200, menampilkan array semua kelas | Menunggu testing | PENDING |

### D.2 Tambah Data Kelas
| No | Endpoint | Method | Jenis Uji | Input | Output yang Diharapkan | Hasil Aktual | Status |
|----|----------|--------|-----------|-------|----------------------|--------------|--------|
| 4.2 | `/api/kelas` | POST | Positive Test | `{"id_kelas": "KLS003", "nama_kelas": "INF-2C", "kapasitas": 30, "tahun_ajaran": "2024/2025", "semester": "genap", "program_studi": "Informatika", "jenjang": "S1"}` | Status 201, data kelas berhasil disimpan | Menunggu testing | PENDING |

### D.3 Edit Data Kelas
| No | Endpoint | Method | Jenis Uji | Input | Output yang Diharapkan | Hasil Aktual | Status |
|----|----------|--------|-----------|-------|----------------------|--------------|--------|
| 4.3 | `/api/kelas/KLS001` | PUT | Positive Test | `{"kapasitas": 45}` | Status 200, data kelas berhasil diupdate | Menunggu testing | PENDING |

### D.4 Hapus Data Kelas
| No | Endpoint | Method | Jenis Uji | Input | Output yang Diharapkan | Hasil Aktual | Status |
|----|----------|--------|-----------|-------|----------------------|--------------|--------|
| 4.4 | `/api/kelas/RK0231` | DELETE | Positive Test | - | Status 200, kelas berhasil dihapus | Menunggu testing | PENDING |

---

## E. TESTING PENGAJARAN CONTROLLER

### E.1 Get All Data Pengajaran
| No | Endpoint | Method | Jenis Uji | Input | Output yang Diharapkan | Hasil Aktual | Status |
|----|----------|--------|-----------|-------|----------------------|--------------|--------|
| 5.1 | `/api/pengajaran` | GET | Positive Test | - | Status 200, menampilkan array semua pengajaran | Menunggu testing | PENDING |

### E.2 Tambah Data Pengajaran
| No | Endpoint | Method | Jenis Uji | Input | Output yang Diharapkan | Hasil Aktual | Status |
|----|----------|--------|-----------|-------|----------------------|--------------|--------|
| 5.2 | `/api/pengajaran` | POST | Positive Test | `{"id_pengajaran": "PJR00003", "id_dosen": "DSN001", "id_matakuliah": "MK0015", "id_kelas": "KLS003", "tahun_ajar": 2024, "semester": "Genap"}` | Status 201, data pengajaran berhasil disimpan | Menunggu testing | PENDING |

### E.3 Edit Data Pengajaran
| No | Endpoint | Method | Jenis Uji | Input | Output yang Diharapkan | Hasil Aktual | Status |
|----|----------|--------|-----------|-------|----------------------|--------------|--------|
| 5.3 | `/api/pengajaran/PJR00001` | PUT | Positive Test | `{"semester": "Ganjil", "tahun_ajar": 2025}` | Status 200, data pengajaran berhasil diupdate | Menunggu testing | PENDING |

### E.4 Hapus Data Pengajaran
| No | Endpoint | Method | Jenis Uji | Input | Output yang Diharapkan | Hasil Aktual | Status |
|----|----------|--------|-----------|-------|----------------------|--------------|--------|
| 5.4 | `/api/pengajaran/PJR00002` | DELETE | Positive Test | - | Status 200, pengajaran berhasil dihapus | Menunggu testing | PENDING |

---

## TESTING SUMMARY REPORT

### Statistik Testing:
- **Total Test Cases**: 20
- **Positive Tests**: 19 (95%)
- **Negative Tests**: 1 (5%)
- **Execution Status**: Semua test cases menunggu eksekusi

### Coverage Analysis:
- **CRUD Operations**: Semua fungsi Create, Read, Update, Delete tercover
- **All Endpoints**: Semua route yang ada di Postman Collection telah dibuat test casenya
- **Data Validation**: Testing validasi input untuk negative test
- **HTTP Methods**: GET, POST, PUT, DELETE semua tercover

