import React from 'react'
import Item from './item'

const List = ({items}) => (
    <ul>
        {items.map((todo, index) => (
            <Item key={index} />
        ))}
    </ul>
);

export default List