import React from "react";
import axios from "axios";
import Task from "./Task";
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

    handeledit=(id)=>{
        axios.get('http://127.0.0.1:8000/api/mytache/'+id+'/edit').then(res=>{
            this.setState({
                id:res.data.id,
                nameT:res.data.nameT,
                dateD:res.data.dateD,
                dateF:res.data.dateF,
                description:res.data.description
            })
        })
    }
    handelupdate=async(e)=>{
        e.preventDefault();
        let id=this.state.id;
      await  axios.put('http://127.0.0.1:8000/api/mytache/'+id,this.state).then(res=>{this.affiche();
      this.state.nameT='';
      this.state.dateD='';
      this.state.dateF='';
      this.state.description='';
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
                handelupdate={this.handelupdate}
                id={this.state.id}
                nameTe={this.state.nameT}
                dateDe={this.state.dateD}
                dateFe={this.state.dateF}
                descriptione={this.state.description}/>

                    {this.state.list.map((value)=>(
                     <Task
                     key={value.id}
                     nameT={value.nameT}
                     dateD={value.dateD}
                     dateF={value.dateF}
                     description={value.description}
                     handeldelete={()=>this.handeldelete(value.id)}
                     handeledit={()=>this.handeledit(value.id)}
                     />
                ))}
            </div>
        );
    }
}
export default Todolist;