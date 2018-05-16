import React, { Component } from 'react'
import { render } from 'react-dom'
import ListContainer from './components/list-container'
import { Provider } from 'react-redux'

import { createStore } from "redux"

const initialState = {
    items: [
        {title: 'item #1', modifiedAt: Date.now()},
        {title: 'item #2', modifiedAt: Date.now()}
    ]
};

const adminApp = (state, action) => {
    if (typeof state === 'undefined') {
        return initialState;
    }

    // For now, don't handle any actions
    // and just return the state given to us.
    return state
};

const store = createStore(
    adminApp,
    window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__()
);

render(
    <Provider store={store}>
        <h1>Hello, world</h1>
        <ListContainer/>
    </Provider>,
    document.getElementById('root')
);
