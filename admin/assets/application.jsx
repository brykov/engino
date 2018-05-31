import React, { Component } from 'react'
import { render } from 'react-dom'
import App from './components/app'
import { Provider } from 'react-redux'
import uuidv4 from './lib/uuid'

import { createStore } from "redux"

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
        <App/>
    </Provider>,
    document.getElementById('root')
);
