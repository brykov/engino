import ReactDOM from "react-dom"
import Admin from "./admin.jsx"
import { createStore } from "redux"
import { adminApp } from "./reducers"
import { connect } from "react-redux"

const store = createStore(
    adminApp,
    window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__()
)

ReactDOM.render(
    new Admin().render(),
    document.getElementById('root')
)