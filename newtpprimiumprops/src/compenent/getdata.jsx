import React from "react";

class Getdata extends React.Component{
    render(){
        return(
            <div>
                <table border='1'>
                    <tr>
                        <td>{this.props.nameT}</td>
                        <td>{this.props.dateD}</td>
                        <td>{this.props.dateF}</td>
                        <td>{this.props.description}</td>
                        <td><button onClick={()=>this.props.handeldelete(this.props.id)}>Delete</button></td>
                    </tr>
                </table>
            </div>
        );
    }
}
export default Getdata;