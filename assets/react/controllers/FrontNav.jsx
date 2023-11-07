import React from 'react';

const FrontNav = () => {
    return (
        <nav className="frontNav">
            <div className="logo">
                <h2><a href="/">Logo</a></h2>
            </div>
            <ul className="navLinks">
                <li><a href="/login">Languages</a></li>
                <li><a href="/login">Prices</a></li>
                <li><a href="/login">Tips</a></li>
                <li><a href="/login">About</a></li>
                <li><a href="/login">FAQ</a></li>
                <li><a href="/login">Contact</a></li>
            </ul>
            <div className="loginBtn">
                <a href="/login">Login</a>
            </div>
        </nav>
    );
}

export default FrontNav;
