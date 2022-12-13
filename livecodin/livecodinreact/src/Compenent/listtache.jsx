import React from "react";
import axios from "axios";
class Listtache extends React.Component{
    state={
        list:[],nametache:'',id:''
    }
    componentDidMount=async()=>{
        await axios.get('http://127.0.0.1:8000/api/Tache').then(res=>{this.setState({list:res.data});});
    }
    handelnomtache=(e)=>{
        console.log(e.target.value);
        this.setState({nametache:e.target.value});
    }
    handelseve=(e)=>{
        e.preventDefault();
        axios.post('http://127.0.0.1:8000/api/Tache',this.state).then(res=>{
            alert('bien ajouter');
            window.location.reload(false);
        })

    }
    handeldeleet=(id)=>{
        axios.delete('http://127.0.0.1:8000/api/Tache/'+id).then(res=>{
            alert('bien supprimer');
            window.location.reload(false);
        })
    }
    handeleedit=(id)=>{
        axios.get('http://127.0.0.1:8000/api/Tache/'+id+'/edit').then(res=>{
            this.setState({nametache:res.data.nametache,id:res.data.id});
        })
    }
    handelupdate=(e)=>{
        e.preventDefault();
        let id=this.state.id;
        axios.put('http://127.0.0.1:8000/api/Tache/'+id,this.state).then(res=>{
            alert('bien modifier');
            window.location.reload(false);
        })
    }
    render(){
        return(
            <div>
                <input type="text" name="nametache" value={this.state.nametache} onChange={this.handelnomtache}/>
                <button onClick={this.handelseve}>ajouter</button>
                <button onClick={this.handelupdate}>modifier</button>
                <table>
                    <thead>
                        <th>Nom Tache</th>
                    </thead>
                    <tbody>
                        {this.state.list.map((value)=>(
                            <tr>
                                <td>{value.nametache}</td>
                                <td><button onClick={()=>this.handeldeleet(value.id)}>supprimer</button></td>
                                <td><button onClick={()=>this.handeleedit(value.id)}>modifier</button></td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        );
    }
}
export default Listtache;