import React from 'react';

const PriceContainer = () => {
    return (


        <div className='priceMain'>
            <h2>Pricing courses</h2>

            <table>
                <tbody>
                    <tr>
                        <th>Lesson duration</th>
                        <th>1 lesson</th>
                        <th>10 lessons</th>
                        <th>20 lessons</th>
                    </tr>
                    <tr>
                        <td> 30-minute lessons</td>
                        <td class=""> 10 € </td>
                        <td class=""> 95 €</td>
                        <td class=""> 170 €</td>
                    </tr>
                    <tr>
                        <td> 45-minute lessons</td>
                        <td class=""> 14 € </td>
                        <td class=""> 135 €</td>
                        <td class=""> 250 €</td>
                    </tr>
                    <tr>
                        <td> 60-minute lessons</td>
                        <td class=""> 18 € </td>
                        <td class=""> 175 €</td>
                        <td class=""> 330 €</td>
                    </tr>
                    <tr>
                        <td> 90-minute lessons</td>
                        <td class=""> 25 € </td>
                        <td class=""> 245 €</td>
                        <td class=""> 470 €</td>
                    </tr>
                </tbody>
            </table>
            <div className="discoverBtn">
                <a href="#">Let's get started</a>
            </div>
        </div>

    );
}

export default PriceContainer;