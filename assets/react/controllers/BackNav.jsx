import React from 'react'


const navigation = [
  { name: 'User', href: '/admin/user', current: true },
  { name: 'Resource', href: '/admin/resource', current: false },
  { name: 'Quiz', href: '/admin/quiz', current: false },
  { name: 'Session', href: '/admin/session', current: false },
  { name: 'Payment', href: '/admin/payment', current: false },
  { name: 'Lesson', href: '/admin/lesson', current: false },
  { name: 'Language', href: '/admin/language', current: false },
  { name: 'Formation', href: '/admin/formation', current: false },
  { name: 'Flag', href: '/admin/flag', current: false },
  { name: 'Assignment', href: '/admin/assignment', current: false },
  { name: 'FAQ', href: '/admin/faq', current: false},
]

function classNames(...classes) {
  return classes.filter(Boolean).join(' ')
}

const BackNav = () => {
    return (
        <nav className="backNav">
            <div className="logo">
                <h2>Logo</h2>
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