import React from 'react';

const Links = [

    { name:'Languages', href: '/languages' },
    { name: 'Prices', href: '/prices' },
    { name: 'Tips', href: '/tips' },
    { name: 'Contact', href: '/contact' },
    { name: 'About', href: '/about' },
    { name: 'Faq', href: '/faq' },
]
    


const FrontNav = () => {
    return (
        <nav className="frontNav">
            <div className="logo">
                <h2><a href="/">Logo</a></h2>
            </div>
            <ul className="navLinks">
                {Links.map((item) => (
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
            <div className="loginBtn">
                    <a href="/login">Login</a>
            </div>
        </nav>
    );
}

export default FrontNav;
