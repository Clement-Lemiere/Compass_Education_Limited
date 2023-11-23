import React from 'react'
import FullCalendar from '@fullcalendar/react'
import dayGridPlugin from '@fullcalendar/daygrid'

const events = [
  { title: 'Meeting', start: new Date() }
]

const navigation = [
  { name: 'Profile', href: '/sprofile' },
  { name: 'Calendar', href: '/scalendar' },
  { name: 'Progress', href: '/sprogress' },
  // { name: 'Mailbox', href: '/' },
  // { name: 'Payment', href: '/' },
  { name: 'Edit Profile', href: '/editSprofile' },

]

const StudentCalendar = () => {
  return (
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
      <div className='calendar'>
        <h1>Calendar</h1>
      <FullCalendar
        plugins={[dayGridPlugin]}
        initialView="dayGridMonth"
        events={[events]}
        eventContent={renderEventContent}
        />
      </div>
    </main>
  )
}

function renderEventContent(eventInfo) {
  return (
    <>
      <b>{eventInfo.timeText}</b>
      <i>{eventInfo.event.title}</i>
    </>
  )
}

export default StudentCalendar