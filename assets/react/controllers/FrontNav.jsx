import React from 'react';
import { Link } from 'react-router-dom'; // Assurez-vous d'avoir react-router-dom installé

const FrontNav = () => {
    return (
        <nav className="frontNav">
            <div className="logo">
                {/* Insérez votre logo ici */}
                <h2>Logo</h2>
            </div>
            <ul className="navLinks">
                <li><a href="/login">Languages</a></li>
                <li><a href="/login">Formation</a></li>
                <li><a href="/login">Cool</a></li>
                {/* Ajoutez d'autres liens selon vos besoins */}
            </ul>
            <div className="loginBtn">
                <a href="/login">Login</a>
            </div>
        </nav>
    );
}

export default FrontNav;
