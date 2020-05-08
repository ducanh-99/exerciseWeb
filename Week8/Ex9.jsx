const ChildComponent = () => {
    return (
        <div>
            <p>I am the child</p>
        </div>
    );
};

class ParentComponent extends React.Component {
    constructor(props) {
        super(props);
    }
    render() {
        return (
            <div>

                { /* change code below this line */ }
                Trả về 2 thẻ con lồng nhau:
                <ChildComponent></ChildComponent>
                { /* change code above this line */ }
            </div>
        );
    }
};
