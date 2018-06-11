import React from 'react'
import {connect} from 'react-redux';
import s from './meta-list.css';
import {
  Route,
  NavLink
} from 'react-router-dom'

const MetaList = ({items, match}) => (
  <div>
    <Route path={`${match.path}/:metaItem`} render={(match) => (
      <div>
        <h1>Meta Config / {match.match.params.metaItem}</h1>
        <div>Title: {itemByUuid(items, match.match.params.metaItem).title}</div>
      </div>
    )}/>
    <Route exact path={match.path} render={() => (
      <div>
        <h1>Meta Config</h1>
        <ul className={s.root}>
          {items.map((item) => (
            <li key={item.uuid}>
              <NavLink to={`/admin/meta/${item.uuid}`}>{item.title}</NavLink>
            </li>
          ))}
        </ul>
      </div>
    )}/>
  </div>
);

const itemByUuid = (items, uuid) => {
  return items.find((item) => item.uuid === uuid);
};

const mapStateToProps = state => {
  return {
    items: state.items
  }
};

const mapDispatchToProps = dispatch => {
  return {}
};

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(MetaList);
