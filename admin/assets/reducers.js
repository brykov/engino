const initialState = {
    items: [
        {title: 'item #1', modifiedAt: Date.now()},
        {title: 'item #2', modifiedAt: Date.now()}
    ]
};

export function adminApp(state, action) {
    if (typeof state === 'undefined') {
        return initialState;
    }

    // For now, don't handle any actions
    // and just return the state given to us.
    return state
}