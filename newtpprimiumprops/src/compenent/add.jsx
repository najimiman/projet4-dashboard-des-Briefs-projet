import React from "react";
class Add extends React.Component{
    render(){

        return(
            <div>
                <input type="text" name="nameT" onChange={this.props.handelNn}/>
                <input type="datetime-local" name="dateD" onChange={this.props.handelDD}/>
                <input type="datetime-local" name="dateF" onChange={this.props.handelDF}/>
                <input type="text" name="description" onChange={this.props.handelD}/>
                <button onClick={this.props.handelsubmit}>Ajouter</button>
            </div>
        );
    }
}
export default Add;