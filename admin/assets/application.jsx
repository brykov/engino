import React, {Component} from 'react'
import {render} from 'react-dom'
import {Provider} from 'react-redux'
import uuidv4 from './lib/uuid'
import {
  BrowserRouter as Router,
  Route,
  NavLink
} from 'react-router-dom'

import Home from './components/home/home'
import MetaList from './components/meta-list/meta-list'
import s from './application.css'

import {createStore} from "redux"

const initialState = {
  items: [
    {title: 'item #1', modifiedAt: Date.now(), uuid: uuidv4()},
    {title: 'item #2', modifiedAt: Date.now(), uuid: uuidv4()}
  ]
};

const adminApp = (state = initialState, action) => {
  return state
};

const store = createStore(
  adminApp,
  window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__()
);

render(
  <Provider store={store}>
    <Router>
      <div className={s.root}>
        <ul className={s.menu}>
          <li><NavLink exact to="/admin" activeClassName={s.menu_item_active}>Admin Home</NavLink></li>
          <li><NavLink to="/admin/meta" activeClassName={s.menu_item_active}>Meta Config</NavLink></li>
        </ul>

        <hr/>

        <Route exact path="/admin" component={Home}/>
        <Route path="/admin/meta" component={MetaList}/>
      </div>
    </Router>
  </Provider>,
  document.getElementById('root')
);
