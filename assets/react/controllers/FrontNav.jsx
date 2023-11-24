import React from 'react';
import Logo from '../../images/logo.png';

const Links = [

    { name:'Languages', href: '/languages' },
    { name: 'Prices', href: '/prices' },
    { name: 'Tips', href: '/tips' },
    { name: 'Contact', href: '/contact' },
    { name: 'About', href: '/about' },
    { name: 'FAQ', href: '/faq' },
]
    
const FrontNav = () => {
    // const [isDropdownOpen, setDropdownOpen] = useState(false);

    // const toggleDropdown = () => {
    //     setDropdownOpen(!isDropdownOpen);
    // };

    return (
        <nav className="frontNav">
            <div className="logo">
                <a href="/"><img src={ Logo } alt="logo" /></a>
            </div>
            <div className='dropdownBtn'>
                <span></span>
                <span></span>
                <span></span>
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