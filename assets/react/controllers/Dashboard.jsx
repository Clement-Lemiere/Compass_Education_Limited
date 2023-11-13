import React from "react";

const Dashboard = () => {
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
            <div className="leftColumn">
                <ul className="aLeft">
                    <li><a href="/sprofile">Profile</a></li>
                    <li><a>Calendar</a></li>
                    <li><a>Progress</a></li>
                    <li><a>Mailbox</a></li>
                    <li><a>Payment</a></li>
                    <li><a>Edit Profile</a></li>
                </ul>
            </div>
        </>

    );
}

export default Dashboard