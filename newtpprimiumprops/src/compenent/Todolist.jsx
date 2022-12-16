import React from "react";
import axios from "axios";
import Getdata from "./getdata";
import Add from "./add";
class Todolist extends React.Component{
    constructor(props){
        super(props);
        this.state={
            list:[],nameT:'',dateD:'',dateF:'',description:'',id:''
        }
    }
    affiche=()=>{
        axios.get('http://127.0.0.1:8000/api/mytache').then(res=>{this.setState({list:res.data});});
    }
    componentDidMount=()=>{
        this.affiche();
    }
    handelN=(e)=>{
        this.setState({nameT:e.target.value});
        console.log(e.target.value);
    }
    handelDD=(e)=>{
        this.setState({dateD:e.target.value});
        console.log(e.target.value);
    }
    handelDF=(e)=>{
        this.setState({dateF:e.target.value});
        console.log(e.target.value);
    }
    handelD=(e)=>{
        this.setState({description:e.target.value});
        console.log(e.target.value);
    }
    handelsubmit=(e)=>{
        e.preventDefault();
        axios.post('http://127.0.0.1:8000/api/mytache',this.state).then(res=>{
            this.affiche();
            this.state.nameT='';
            this.state.dateD='';
            this.state.dateF='';
            this.state.description='';
        })
    }
    handeldelete=(id)=>{
        axios.delete('http://127.0.0.1:8000/api/mytache/'+id).then(res=>{
            this.affiche();
        })
    }
    render(){
        return(
            <div>
                <Add handelNn={this.handelN}
                handelDD={this.handelDD}
                handelDF={this.handelDF}
                handelD={this.handelD}
                handelsubmit={this.handelsubmit}
                nameTe={this.state.nameT}
                     dateDe={this.state.nameT}
                     dateFe={this.state.nameT}
                     descriptione={this.state.description}/>
                     
                {this.state.list.map((value)=>(
                     <Getdata
                     nameT={value.nameT}
                     dateD={value.dateD}
                     dateF={value.dateF}
                     description={value.description}
                     id={value.id}
                     handeldelete={()=>this.handeldelete(value.id)}
                     />
                ))}
            </div>
        );
    }
}
export default Todolist;