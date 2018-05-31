import React from 'react'
import Item from './item'
import {connect} from 'react-redux';

const List = ({items}) => (
    <ul>
        {items.map((item) => (
            <Item key={item.uuid} title={item.title}/>
        ))}
    </ul>
);


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
)(List);
