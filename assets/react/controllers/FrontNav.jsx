import React from 'react';


const FrontNav = () => {
    return (
        <nav className="frontNav">
            <div className="logo">
                <h2><a href="/">Logo</a></h2>
            </div>
            <ul className="navLinks">
                <li><a href="/languages">Languages</a></li>
                <li><a href="/prices">Prices</a></li>
                <li><a href="/tips">Tips</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/faq">FAQ</a></li>
                <li><a href="/sprofile">Profile</a></li>
            </ul>
            <div className="loginBtn">
                    <a href="/login">Login</a>
            </div>
        </nav>
    );
}

export default FrontNav;
