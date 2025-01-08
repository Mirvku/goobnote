// Menunggu hingga DOM sepenuhnya dimuat
document.addEventListener('DOMContentLoaded', function () {
  // Mengambil elemen input password dan tombol toggle
  const passwordInput = document.querySelector('input[type="password"]');
  const togglePassword = document.querySelector('.toggle-password');

  // Event listener untuk tombol toggle password
  togglePassword.addEventListener('click', function () {
    // Toggle tipe input antara "password" dan "text"
    const type =
      passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);

    // Mengubah icon sesuai dengan status password
    if (type === 'password') {
      this.src = '/spiral/img/eye.png'; // Icon untuk menampilkan password
    } else {
      this.src = '/spiral/img/eye-off.png'; // Icon untuk menyembunyikan password
    }
  });
});
