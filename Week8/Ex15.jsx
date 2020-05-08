const List = (props) => {
    { /* change code below this line */ }
    return <p>{props.tasks.join(', ')}</p>
    { /* change code above this line */ }
};

class ToDo extends React.Component {
    constructor(props) {
        super(props);
    }
    render() {
        return (
            <div>
                <h1>To Do Lists</h1>
                <h2>Today</h2>
                { /* change code below this line */ }
                <List tasks={["Work 1", "Work 2"]}></List>
                <h2>Tomorrow</h2>
                <List tasks={["Work 1", "Work 2", "Work 3"]}></List>
                { /* change code above this line */ }
            </div>
        );
    }
};
