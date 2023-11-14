import React from 'react'


const navigation = [
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
                <h2><a href="/">Logo</a></h2>
            </div>
            <ul className="navLinks">
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
            <div className="logoutBtn">
                <a href="/logout">
                    Logout
                </a>
            </div>
        </nav>
    );
}

export default BackNav;