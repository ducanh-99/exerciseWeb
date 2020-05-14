const ShoppingCart = (props) => {
    return (
        <div>
            <h1>Shopping Cart Component</h1>
            <h2>{props.items}</h2>
        </div>
    )
};

// change code below this line
ShoppingCart.defaultProps = {
    items: 0
}
// gán mặc định trong react
// ShoppingCart.defaultProps = {
//     items: 0
// }