import React from "react";
import axios from "axios";
class Login extends React.Component{
    state ={
        list:[],id:'',Annee_scolaire:'',Nom_groupe:''
    }
    afficher=async()=>{
    await axios.get('http://127.0.0.1:8000/api/Anneformation').then(res=>{console.log(res.data);
this.setState({
    list:res.data
})})
    }
    componentDidMount=()=>{
        this.afficher();
    }
    handelselect=async(e)=>{
        
        this.setState({Annee_scolaire:e.target.value})
        let Annee_scolaire=e.target.value;
        await axios.get('http://127.0.0.1:8000/api/mymethode/1/'+Annee_scolaire).then(res=>{console.log(res.data);
    this.setState({Nom_groupe:res.data.Nom_groupe})})
    }
    render(){
        return(
        <div>
            hello login
            <select name="Annee_scolaire" id="" onChange={this.handelselect} >
                <option value="">Annee_scolaire</option>
                {this.state.list.map((value)=>(
                    <option value={value.Annee_scolaire} key={value.id}>{value.Annee_scolaire}</option>
                ))}
            </select>
            <label htmlFor="">{this.state.Nom_groupe}</label>
        </div>
        );
    }
}
export default Login;