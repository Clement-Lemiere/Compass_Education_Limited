import React from "react";

const NavTopDashboard = () => {
    return (

        <>
            <nav className="navTop">
                <div className="links">
                    <div className="logo"><a href="/">Logo</a></div>
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