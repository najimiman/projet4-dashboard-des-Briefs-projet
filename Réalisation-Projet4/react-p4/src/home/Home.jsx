import React from "react";
import axios from "axios";
class Home extends React.Component {
    state = {
        list: [],Annee_scolaire:'',id:'',list1:[]
    }
   
    Afficher = () => {
        
        axios.get('http://127.0.0.1:8000/api/Anneformation').then(res => { this.setState({ list: res.data }); 
    console.log(res.data);
    });
        
    }
    componentDidMount = async () => {
        await this.Afficher();
    }
    handelselect=async(e)=>{
        this.setState({Annee_scolaire:e.target.value});
        console.log(e.target.value);
        let Annee_scolaire=e.target.value;
       await axios.get('http://127.0.0.1:8000/api/mymethode/5/'+Annee_scolaire).then((res)=>{console.log(res.data);
       this.setState({
        list1:res.data,id:res.data.id});
        console.log(res.data.id);
        })
    
    }
    render() {
        return (
            <div>
                hello home
                <select value={this.state.Annee_scolaire} id='myselect' onChange={this.handelselect}>
                    <option value="">choix</option>
                {this.state.list.map((value)=>(
                    <option value={value.Annee_scolaire} key={value.id}>{value.Annee_scolaire}</option>
                ))}
                </select>
                <table>
                    <tbody>
                        {this.state.list1.map((value)=>(
                            <tr key={value.id}>
                                <td><label name='id'>{value.id}</label> </td>
                                <td><label>{value.Nom_groupe}</label></td>
                                <td><label>{value.id_formateur}</label></td>
                                <td><label>{value.Nom_formateur}</label></td>
                                <td><label>{value.Annee_scolaire}</label></td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        );
    }
}
export default Home;