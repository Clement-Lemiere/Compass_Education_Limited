import React from 'react';

const FrontNav = () => {
    return (
        <nav className="frontNav">
            <div className="logo">
                <h2>Logo</h2>
            </div>
            <ul className="navLinks">
                <li><a href="/login">About</a></li>
                <li><a href="/login">FAQ</a></li>
                <li><a href="/login">Prices</a></li>
            </ul>
            <div className="loginBtn">
                <a href="/login">Login</a>
            </div>
        </nav>
    );
}

export default FrontNav;
