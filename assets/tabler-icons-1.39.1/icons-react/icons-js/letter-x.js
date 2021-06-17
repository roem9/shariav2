import * as React from "react";

function IconLetterX({
  size = 24,
  color = "currentColor",
  stroke = 2,
  ...props
}) {
  return <svg className="icon icon-tabler icon-tabler-letter-x" width={size} height={size} viewBox="0 0 24 24" strokeWidth={stroke} stroke={color} fill="none" strokeLinecap="round" strokeLinejoin="round" {...props}><path stroke="none" d="M0 0h24v24H0z" fill="none" /><line x1={7} y1={4} x2={17} y2={20} /><line x1={17} y1={4} x2={7} y2={20} /></svg>;
}

export default IconLetterX;