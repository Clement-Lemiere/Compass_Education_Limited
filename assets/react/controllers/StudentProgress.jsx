import React, { useState, useEffect } from 'react';


function StudentProgress() {


    const navigation = [
        { name: 'Profile', href: '/sprofile' },
        { name: 'Calendar', href: '/scalendar' },
        { name: 'Progress', href: '/sprogress' },
        { name: 'Edit Profile', href: '/editSprofile' },

    ]

    return (

        //_____________________________ PAGE CONTENT_______________________________________\\

        <main className='profilePage'>

            {/* LEFT COLUMN */}

            <div className="leftColumn">
                <ul className="aLeft">
                    {navigation.map((item) => (
                        <li>
                            <a
                                key={item.name}
                                href={item.href}
                                aria-current={item.current ? 'page' : undefined}
                            >
                                {item.name}
                            </a>
                        </li>
                    ))}
                </ul>
            </div>

            {/* MAIN CONTENT */}

            <div className="mainCtn">
                <h1>PROGRESS</h1>
                <div className='progressBar'>
                    <progress value={0} max={100} />
                    <progress value={10} max ={100} />
                    <progress value={30} max={100} />
                    <progress value={55} max={100} />
                    <progress value={75} max={100} />
                    <progress value={90} max={100} />
                </div>
            </div>
        </main>
    );
}

export default StudentProgress;
