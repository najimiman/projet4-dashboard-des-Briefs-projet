import React from "react";
class Add extends React.Component{
    render(){

        return(
            <div>
                <input type="text" name="nameT" value={this.props.nameTe} onChange={this.props.handelNn}/>
                <input type="datetime-local" name="dateD" value={this.props.dateDe} onChange={this.props.handelDD}/>
                <input type="datetime-local" name="dateF" value={this.props.dateFe} onChange={this.props.handelDF}/>
                <input type="text" name="description" value={this.props.descriptione} onChange={this.props.handelD}/>
                <button onClick={this.props.handelsubmit}>Ajouter</button>
            </div>
        );
    }
}
export default Add;