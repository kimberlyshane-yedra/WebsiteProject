document.addEventListener('DOMContentLoaded', () => {
    // KUNIN ANG MGA ELEMENTS MULA SA HTML
    const loginFormDiv = document.getElementById('login-form');
    const signupFormDiv = document.getElementById('signup-form');
    const showSignupLink = document.getElementById('show-signup');
    const showLoginLink = document.getElementById('show-login');
    


    // Function para ipakita ang Sign Up at itago ang Log In
    showSignupLink.addEventListener('click', (e) => {
        e.preventDefault(); 
        loginFormDiv.style.display = 'none';
        signupFormDiv.style.display = 'block';
    });

    // Function para ipakita ang Log In at itago ang Sign Up
    showLoginLink.addEventListener('click', (e) => {
        e.preventDefault();
        signupFormDiv.style.display = 'none';
        loginFormDiv.style.display = 'block';
    });
    
});