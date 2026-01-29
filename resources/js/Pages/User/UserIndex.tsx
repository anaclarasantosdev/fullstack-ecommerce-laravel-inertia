import { Head } from '@inertiajs/react';
import { PageProps } from '@/types';

interface User{
    auth: {}
    id:number,
    name: string,
    email: string
}

interface UserProps {
    users: User[]
}

export default function UserIndex({ auth ,users }: PageProps<{users: User[]}>){
    console.log(auth.user);
    return (
            <div className='p-6'>
                <Head title='Lista de Usuários'/>
                <h2>ola {auth.user.name}</h2>
                <h1 className='text-2xl font-bold mb-4' >Usuários</h1>
                <table className='min-w-full bg-white border'>
                    <thead>
                        <tr>
                            <th className='border px-4  py-2'>Id</th>
                            <th className='border px-4  py-2'>Nome</th>
                            <th className='border px-4  py-2'>E-mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        {users.map(user => 
                        (
                            <tr key={user.id}>
                                <td className="border px-4 py-2">{user.id}</td>
                                <td className="border px-4 py-2">{user.name}</td>
                                <td className="border px-4 py-2">{user.email}</td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
    );
} 