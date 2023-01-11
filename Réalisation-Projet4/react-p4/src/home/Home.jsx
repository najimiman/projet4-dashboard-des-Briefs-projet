import React from "react";
import axios from "axios";
// import  {Avencement_group} from './AvencementGroup';
class Home extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            list: [],Annee_scolaire:'',id:'',Nom_groupe:'',nb:'',
            group_av : ''
        };
  }
    Afficher = () => {
        
        axios.get('http://127.0.0.1:8000/api/Anneformation').then(res => { this.setState({ list: res.data }); 
    console.log(res.data);
    });
        
    }
    componentDidMount = async () => {
        await this.Afficher();
        // await this.handelafficher();
    }
    handelselect=async(e)=>{
        this.setState({Annee_scolaire:e.target.value});
        console.log(e.target.value);
        let Annee_scolaire=e.target.value;
       await axios.get('http://127.0.0.1:8000/api/mymethode/1/'+Annee_scolaire).then((res)=>{console.log(res.data);
       this.setState({
        Nom_groupe:res.data.Nom_groupe,id:res.data.id});
        console.log(res.data.id);
        console.log(res.data.Nom_groupe);
        axios.get('http://localhost:8000/api/group/'+Annee_scolaire).then((res) => {
        this.setState({
        //   group: res.data.group,
        //   studentCount: res.data.studentCount,
        //   brief_affs : res.data.brief_aff[0],
        //   briefs_av : res.data.briefs,
          group_av : res.data.group_av
        });
      });
    //     axios.get('http://127.0.0.1:8000/api/mymethodecounte/'+res.data.id).then((res)=>{console.log(res.data);
    //     this.setState({nb:res.data.nb});
    //     console.log(res.data.nb);
    // })
        })
       
    
    }
   
    render() {
        return (
            <div>
                hello home
                <select value={this.state.Annee_scolaire} id='myselect' onChange={this.handelselect}>
                    <option value="">choix</option>
                {this.state.list.map((value)=>(
                    <option value={value.id} key={value.id}>{value.Annee_scolaire}</option>
                ))}
                </select>
                        <label htmlFor="" name="Nom_groupe"> {this.state.Nom_groupe}</label>
                        <label htmlFor="" name="nb"> {this.state.nb}</label>
                        <label htmlFor="" name="Annee_scolaire"> {this.state.Annee_scolaire}</label>
                        {/* <Avencement_group data={this.state.group_av}/> */}
            </div>
        );
    }
}
export default Home;