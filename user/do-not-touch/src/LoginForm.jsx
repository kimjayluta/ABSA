import React from 'react'
import { Button, Form, Grid, Header, Image, Message, Segment } from 'semantic-ui-react'

function tryLogin(username, password){
	let formData = new FormData();
	formData.append('usn', 'admin');
	formData.append('password', 'admin');

	fetch(`//${window.location.hostname}/user/api/login.php`,
		{
			body: formData,
			method: "post"
		}).then(response => response.json())
			.then(jsondata => console.log(jsondata))
}

function LoginForm() {
	return (
		<div className='login-form'>
			<style>{`
      body > div,
      body > div > div,
      body > div > div > div.login-form {
        height: 100%;
      }
    `}
			</style>
			<Grid textAlign='center' style={{height: '100%'}} verticalAlign='middle'>
				<Grid.Column style={{maxWidth: 350}}>
					<Segment>
						<Image src={require("./img/IMG_20190509_114203.jpg")}/>
						<Form size='large'>
							<Form.Input fluid icon='user' iconPosition='left' placeholder='Username'/>
							<Form.Input
								fluid
								icon='lock'
								iconPosition='left'
								placeholder='Password'
								type='password'
							/>

							<Button color='blue' fluid size='small'>Login </Button>
						</Form>
					</Segment>
				</Grid.Column>
			</Grid>
		</div>
	);
};

export default LoginForm
