import { registerReactControllerComponents } from '@symfony/ux-react';
import './bootstrap.js';
/*
* Welcome to your app's main JavaScript file!
*
* We recommend including the built version of this JavaScript file
* (and its CSS file) in your base layout (base.html.twig).
*/

// any CSS you import will output into a single css file (app.css in this case)
import './styles/normalize.css';
import './styles/app.scss';
import './styles/form.scss';
import './styles/table.scss';
import './styles/newUser.scss';
import './styles/prices.scss';
import './styles/contact.scss';
import './styles/dashboard.scss';
import './styles/card.scss';
import './styles/calendar.scss';
import './styles/progress.scss';



registerReactControllerComponents(require.context('./react/controllers/', true, /\.(j|t)sx?$/));
