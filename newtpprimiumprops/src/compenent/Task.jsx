import React from "react";

class Task extends React.Component{
    render(){
        return(
            <div>
                <table>
                    <tbody>
                    <tr>
                        <td>{this.props.nameT}</td>
                        <td>{this.props.dateD}</td>
                        <td>{this.props.dateF}</td>
                        <td>{this.props.description}</td>
                        <td><button onClick={()=>this.props.handeldelete(this.props.id)}>Delete</button></td>
                        <td><button onClick={()=>this.props.handeledit(this.props.id)}>modifier</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        );
    }
}
export default Task;