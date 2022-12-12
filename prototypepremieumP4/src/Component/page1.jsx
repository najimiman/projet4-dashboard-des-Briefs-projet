import React from 'react'
import axios from 'axios';

class App extends React.Component{
    
    state={
        list:[],id:'',
        nameT:'',dateD:'',dateF:'',description:''
    }

    componentDidMount=()=>{
        axios.get('http://127.0.0.1:8000/api/mytache').then(res=>{
            //console.log(res.data);
            this.setState({list:res.data});
            
        });
    }
   
    handleSubmit =async (event) => {
                    event.preventDefault();

                    await axios.post("http://127.0.0.1:8000/api/mytache",this.state)
                    .then(res => {
                        console.log(res);
                        console.log(res.data);
                    }) .then((res)=> alert("add success"));
                        window.location.reload(false); 
                }
    handelnamet=(e)=>{
        console.log(e.target.value);
        this.setState({nameT:e.target.value});
    }
    handeldated=(e)=>{
        console.log(e.target.value);
        this.setState({dateD:e.target.value});
    }
    handeldatef=(e)=>{
        console.log(e.target.value);
        this.setState({dateF:e.target.value});
    }
    handeldescrip=(e)=>{
        console.log(e.target.value);
        this.setState({description:e.target.value});
    }
    
    handledelete=(id)=>{
        axios.delete('http://127.0.0.1:8000/api/mytache/'+id).then(res=>{alert("delete success");
        window.location.reload(false); 
        
    });
    }
    
    handleedit=(id)=>{
        axios.get('http://127.0.0.1:8000/api/mytache/'+id+'/edit').then(res=>{console.log(res.data);
        this.setState({id:res.data.id,
            nameT:res.data.nameT,
            dateD:res.data.dateD,
            dateF:res.data.dateF,
            description:res.data.description});

    })
    }
    handleupdate =async (event) => {
        event.preventDefault();
        let id =  this.state.id ;
        await axios.put("http://127.0.0.1:8000/api/mytache/"+id,this.state).then(res =>{
            console.log(res);
            console.log(res.data);
        }).then((res)=> alert("update success"));
            window.location.reload(false); 
    }
    render(){
        
        return(
        <div>
                <h1>hello</h1>
                
                    <input type="text" name="nameT" value={this.state.nameT} onChange={this.handelnamet}/>
                    <input type="datetime-local" name="dateD" value={this.state.dateD} onChange={this.handeldated}/>
                    <input type="datetime-local" name="dateF" value={this.state.dateF} onChange={this.handeldatef}/>
                    <input type="text" name="description" value={this.state.description} onChange={this.handeldescrip}/>
                    <button onClick={this.handleSubmit}>add</button>
                    <button onClick={this.handleupdate}>update</button>
                <table>
                
                    <tbody>
                        
                        {this.state.list.map((value)=>(
                            <tr>
                                <td>{value.nameT}</td>
                                <td>{value.dateD}</td>
                                <td>{value.dateF}</td>
                                <td>{value.description}</td>
                                <td><button onClick={()=>this.handledelete(value.id)}>supprimer</button></td>
                                <td><button onClick={()=>this.handleedit(value.id)}>modifier</button></td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        );
    }
}
export default App