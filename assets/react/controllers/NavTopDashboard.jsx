import React from "react";
import Logo from '../../images/logo.png';

const NavTopDashboard = () => {
    return (

        <>
            <nav className="navTop">
                <div className="links">
                    <div className="logo"><a href="/sprofile"><img src={Logo} alt="logo" /></a></div>
                <ul className="aTop">
                    <li><a href="/">Home</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
                </div>
                <div className="backlogBtn">
                    <a href="/logout">Logout</a>
                </div>
            </nav>
        </>

    );
}

export default NavTopDashboard