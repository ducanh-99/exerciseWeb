class MyComponent extends React.Component {
    constructor(props) {
        super(props);
    }
    render() {
        // change code below this line

        return (
            <h1>
                My First React Component!
            </h1>
        );
        // change code above this line
    }
};
ReactDOM.render(<MyComponent/>, document.getElementById('challenge-node'));
//There is a div with id='challenge-node' available for you to use.
// Tự viết hàm JSX và dùng ReactDom