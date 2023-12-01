import React from 'react'
import Logo from '../../images/logo.png'


const Links = [
  { name: 'User', href: '/admin/user' },
  { name: 'Resource', href: '/admin/resource'},
  { name: 'Quiz', href: '/admin/quiz'},
  { name: 'Session', href: '/admin/session'},
  { name: 'Payment', href: '/admin/payment'},
  { name: 'Lesson', href: '/admin/lesson'},
  { name: 'Language', href: '/admin/language'},
  { name: 'Formation', href: '/admin/formation'},
  { name: 'Assignment', href: '/admin/assignment'},
  { name: 'FAQ', href: '/admin/faq'},
]

const BackNav = () => {
    return (
        <nav className="backNav">
            <div className="logo">
                <a href="/"><img src={Logo} alt="logo" /></a>
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
            <div className="logoutBtn">
                <a href="/logout">
                    Logout
                </a>
            </div>
        </nav>
    );
}

export default BackNav;