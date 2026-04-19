document.addEventListener('DOMContentLoaded', () => {
  const loginForm = document.getElementById('login-form');
  const messageBox = document.getElementById('login-message');

  loginForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    // UI Feedback
    messageBox.classList.remove('hidden', 'text-red-500', 'text-green-500');
    messageBox.innerText = 'Checking credentials...';

    const formData = new FormData(loginForm);
    const data = Object.fromEntries(formData);

    try {
      const response = await fetch(`${loginSettings.root}auth/v1/login`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-WP-Nonce': loginSettings.nonce // The security handshake
        },
        body: JSON.stringify(data)
      });

      const result = await response.json();

      if (response.ok) {
        messageBox.classList.add('text-green-500');
        messageBox.innerText = 'Success! Redirecting...';
        window.location.href = loginSettings.home;
      } else {
        messageBox.classList.add('text-red-500');
        messageBox.innerText = result.message || 'Login failed.';
      }
    } catch (error) {
      messageBox.classList.add('text-red-500');
      messageBox.innerText = 'Server error. Try again later.';
    }
  });
});