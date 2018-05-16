import {connect} from 'react-redux';
import List from './list'

const mapStateToProps = state => {
    return state.items
};

const mapDispatchToProps = dispatch => {
    return {}
};

const ListContainer = connect(
    mapStateToProps,
    mapDispatchToProps
)(List);

export default ListContainer
