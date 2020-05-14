class MyComponent extends React.Component {
    constructor(props) {
      super(props);
      this.state = {
        text: "Hello"
      };
      // change code below this line
      this.handleClick= this.handleClick.bind(this);
      // change code above this line
    }
    handleClick() {
      this.setState({
        text: "You clicked!"
      });
    }
    render() {
      return (
        <div>
          { /* change code below this line */ }
          <button onClick= {this.handleClick}>Click Me</button>
          { /* change code above this line */ }
          <h1>{this.state.text}</h1>
        </div>
      );
    }
  };
 // dùng bind và bắt sự kiện cho button
 //Trong Class Components của React, khi bạn truyền vào một callback, nó có thể mất đi context của nó.
 // Hay khi sự kiện diễn ra, hàm được gọi, giá trị của this sẽ trở về default binding 