## 🎯 Fitur Utama

### 👨‍🎓 Untuk User / Siswa
- 🔐 **User Authentication**
  - Register & login user
  - Manajemen profil dasar
- 📱 **Responsive UI**
  - Tampilan yang menyesuaikan berbagai ukuran layar (mobile, tablet, desktop)
  - Menggunakan komponen dan utility class dari Bootstrap 5.2
- 📚 **Course Listing**
  - Melihat daftar course yang tersedia
  - Detail course: deskripsi, level, harga, dan materi
- 🎯 **Filter & Kategori**
  - Filter course berdasarkan kategori, misalnya:
    - Piano
    - Guitar
    - Violin
- 🛒 **Add to Cart**
  - Menambahkan course ke keranjang
  - Melanjutkan ke proses checkout
- 💳 **Payment Gateway Integration**
  - Integrasi dengan payment gateway (contoh: Midtrans)
  - Simulasi pembayaran online untuk pembelian course
- 🎼 **My Courses**
  - Melihat course yang sudah dibeli
  - Akses materi/lesson yang sudah terbuka

### 🛠️ Untuk Admin
- 📊 **Admin Dashboard**
  - Melihat statistik user yang mendaftar
  - Melihat daftar course, order, dan payment
- 🎓 **Course Management**
  - CRUD Course (Create, Read, Update, Delete)
  - Mengatur kategori course (Piano, Guitar, Violin, dll.)
  - Mengatur materi / lesson per course
- 👥 **User Management**
  - Melihat daftar user yang terdaftar
- 💰 **Payment & Enrollment Tracking**
  - Melihat transaksi pembayaran
  - Melihat user yang sudah enroll ke course tertentu

---

## 🧰 Tech Stack

- **Backend Framework** : [Laravel 12](https://laravel.com/)
- **Language**         : PHP 8.x
- **Frontend**         : Blade Templates + [Bootstrap 5.2](https://getbootstrap.com/)
- **UI Layout**        : Fully responsive layout dengan Bootstrap 5.2 (tanpa custom CSS berat)
- **Database**         : MySQL
- **Payment Gateway**  : Midtrans (sandbox, untuk simulasi pembayaran)
- **Authentication**   : Laravel Auth (login / register user)
- **CSS Utilities**    : Bootstrap utility classes (spacing, grid, responsive)
