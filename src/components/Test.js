import React, { useState } from 'react';

export default function Test() {
  const [data, setData] = useState();
  const handleClick = () => {
    setData('Are you kidding!');
  };
  return (
    <div>
      <button onClick={handleClick}>Great!!</button>
      <div>{data}</div>
    </div>
  );
}
