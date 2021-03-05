import React, { useState } from 'react'
import {instance} from "../components/axios"

const SignUp = ({url}) =>
{
    const [username, setUsername] = useState( "" )
    const [email,setEmail] = useState("")
    const [password,setPassword] = useState("")    
    const [confirmPassword, setConfirmPassword] = useState( "" )
    
    const handleClick = (e) =>
    {
        e.preventDefault()
        instance.post( "users/signup", {
            username,
            email,
            password,
            confirmPassword
        } ).then((response) => console.log(response)
       ).catch((err) => console.log(err))
    }

    return (
        <form>
            <div class="col-auto">
                <label class="sr-only" for="inlineFormInputGroup">Username</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                    </div>
                    <input onChange={(e) => setUsername(e.target.value)} type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username"/>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input onChange={(e) => setEmail(e.target.value)} type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"/>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input onChange={(e) => setPassword(e.target.value)} type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"/>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input onChange={(e) => setConfirmPassword(e.target.value)} type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"/>
            </div>
            <button onClick={handleClick} type="submit" class="btn btn-primary">Submit</button>
        </form>
    )
}

export default SignUp
