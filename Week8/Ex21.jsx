class StatefulComponent extends React.Component {
    constructor(props) {
      super(props);
      // initialize state here
      this.state={
        name: "Abc",
      }
    }
    render() {
      return (
        <div>
          <h1>{this.state.name}</h1>
        </div>
      );
    }
  };
//state trong React
// khai báo thành phần name trong state
// state được sử dụng trong suốt một vòng đời